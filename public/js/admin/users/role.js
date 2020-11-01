// Get Role Data
easyhttp.prototype.formatDataRole = (data) => {
    const select = document.querySelector('#role');
    if(data.length > 0){
        data.forEach((item) => {
            let opt = document.createElement('option');
            opt.value = item.id_permission;
            opt.innerHTML = item.nom_permission;
            select.appendChild(opt);
        });
    }
}
