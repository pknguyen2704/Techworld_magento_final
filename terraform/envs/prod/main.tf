provider "google" {
  credentials = file("/Users/andrew/Dev/EnterpriseApp/enterprise-452702-6fcac976a1a5.json")
  project     = "enterprise-452702"
  region      = "asia-southeast1"
  zone        = "asia-southeast1-a"
}

resource "google_container_cluster" "techworld" {
  name                     = "techworld-cluster"
  location                 = "asia-southeast1-a"
  remove_default_node_pool = true
  initial_node_count       = 1

  release_channel {
    channel = "REGULAR"
  }

  logging_service    = "logging.googleapis.com/kubernetes"
  monitoring_service = "monitoring.googleapis.com/kubernetes"

  networking_mode    = "VPC_NATIVE"
  network            = "default"
  subnetwork         = "default"

  ip_allocation_policy {}

  vertical_pod_autoscaling {
    enabled = true
  }

  addons_config {
    http_load_balancing {
      disabled = false
    }
  }

  node_config {
    machine_type = "e2-medium"
    disk_size_gb = 30                       
    image_type   = "UBUNTU_CONTAINERD"     
    oauth_scopes = [
      "https://www.googleapis.com/auth/cloud-platform"
    ]

    shielded_instance_config {
      enable_secure_boot          = true
      enable_integrity_monitoring = true
    }

    metadata = {
      disable-legacy-endpoints = "true"
    }

    labels = {
      env = "prod"
    }

    tags = ["gke-node"]
  }
}

resource "google_container_node_pool" "default_nodes" {
  name     = "default-node-pool"
  cluster  = google_container_cluster.techworld.name
  location = google_container_cluster.techworld.location

  node_count = 3

  node_config {
    machine_type = "e2-medium"
    disk_size_gb = 30                      
    image_type   = "UBUNTU_CONTAINERD"    
    oauth_scopes = [
      "https://www.googleapis.com/auth/cloud-platform"
    ]

    shielded_instance_config {
      enable_secure_boot          = true
      enable_integrity_monitoring = true
    }

    metadata = {
      disable-legacy-endpoints = "true"
    }

    labels = {
      env = "prod"
    }

    tags = ["gke-node"]
  }

  management {
    auto_upgrade = true
    auto_repair  = true
  }

  autoscaling {
    min_node_count = 3
    max_node_count = 3
  }
}
