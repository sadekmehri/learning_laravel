// Get One Person Data
easyhttp.prototype.formatDataPerson = (data) => {
    if(data.length > 0){
        data.forEach((item) => {
            document.querySelector('#nom').value = item.name_user;
            document.querySelector('#prenom').value = item.prenom_user;
            document.querySelector('#email').value = item.email_user;
            document.querySelector('#role').value = item.id_permission;
        });
    }
}
