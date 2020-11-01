easyhttp.prototype.formatDataTable = (data) => {
    let content = "";
    const table = $('table tbody');
    if(data.length === 0) {
        content = `<tr><td colspan="7">There is no record</td></tr>`;
    }else{
        data.data.forEach((item) => {
            content += `<tr>
                <td>${item.id_user}</td><td> ${item.name_user}</td><td>${item.prenom_user}</td>
                <td>${item.email_user}</td><td>${(item.is_active_user === "0") ? "Non Active" : "Active"}</td>
                <td>${item.nom_permission}</td>
                <td>
                <a class="btn btn-small btn-primary" href="/admin/users/${item.id_user}/edit">Edit</a>
                <a class="btn btn-small btn-danger" href="/admin/users/${item.id_user}">Delete</a>
                </td>
                </tr>`;
        });
    }
    table.append(content);
}



