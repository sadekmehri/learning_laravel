function error(data){
    const el = document.querySelector(".container");
    while(el.firstChild)
        el.removeChild(el.firstChild);

    el.appendChild(createImage());
    alert(data);
}

function createImage(){
    const img = document.createElement('img');
    img.classList.add('centerImage');
    img.src = 'http://myapplication/photo/bug_fixing.png';
    return img;
}
