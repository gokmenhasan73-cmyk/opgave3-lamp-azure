variable "subscription_id" {
  description = "Azure Subscription ID"
  type        = string
  sensitive   = true
}
variable "admin_cidr" {
  description = "Public IP address allowed to SSH to the VM"
  type        = string
}
variable "ssh_public_key" {
  description = "SSH public key for VM administrator"
  type        = string
  sensitive   = true
}