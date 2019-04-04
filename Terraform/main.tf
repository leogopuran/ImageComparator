provider "azurerm" {
    version = "=1.20.0"
}

#create resource-group
resource "azurerm_resource_group" "dev" {
    name     = "rg-dev"
    location = "eastus"
}

# Create a virtual network
resource "azurerm_virtual_network" "vnet" {
    name                = "vnet-dev"
    address_space       = ["10.0.0.0/16"]
    location            = "eastus"
    resource_group_name = "${azurerm_resource_group.dev.name}"
}

# Create a subnet
resource "azurerm_subnet" "subnet" {
    name                 = "subnet-dev-appService"
    resource_group_name  = "${azurerm_resource_group.dev.name}"
    virtual_network_name = "${azurerm_virtual_network.vnet.name}"
    address_prefix       = "10.0.1.0/24"
}

# Create an app-service-plan
resource "azurerm_app_service_plan" "appServicePlan" {
  name                = "api-appserviceplan-dev"
  location            = "${azurerm_resource_group.dev.location}"
  resource_group_name = "${azurerm_resource_group.dev.name}"

  sku {
    tier = "Free"
    size = "F1"
  }
}
# Create an app-service
resource "azurerm_app_service" "webApp" {
  name                = "imgcmp"
  location            = "${azurerm_resource_group.dev.location}"
  resource_group_name = "${azurerm_resource_group.dev.name}"
  app_service_plan_id = "${azurerm_app_service_plan.appServicePlan.id}"
}
