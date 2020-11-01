easyhttp.prototype.getData = (url, ins) => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            ins.open("GET", url, true);
            ins.onload = () => {
                if(ins.status === 200)
                    resolve(JSON.parse(ins.responseText));
                else
                    reject(JSON.parse(ins.responseText));
            }
            ins.send();
        },800);
    });
}
