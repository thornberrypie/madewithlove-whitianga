window.onload = function() {
  // Get the hidden form field that should contain a default email
  // that we will overwrite with the supplier email
  var hiddenMailField = document.getElementById('field_supplier_id')

  // Only proceed if the email field exists
  if(hiddenMailField) {
    var hiddenNameField = document.getElementById('field_supplier_name')
    
    // Get the supplier email from the title's data-supplier-email attribute
    var supplierTitle = document.getElementById('mwl-supplier-title')

    if(supplierTitle) {
      var supplierEmail = supplierTitle.getAttribute('data-supplier-email')
      var supplierName = supplierTitle.getAttribute('data-supplier-title')

      // Add the supplier email and name to the hidden form fields
      if(supplierEmail) {
        hiddenMailField.setAttribute('value', supplierEmail)
      }
      if(supplierName) {
        hiddenNameField.setAttribute('value', supplierName)
      }
    }
  }
}
