// finding hastag
document.querySelectorAll(".captions").forEach(function (el) {
    //select all class .caption
    let renderedText = el.innerHTML.replace(
        /#(\w+)/g,
        "<a href='/search?query=%23$1'>#$1</a>"
    );
    //ambil isinya lalu semua yang ada # diganti dengan sebuah link yang link tersebut masuk kedalam
    // sistem pencariannya %23 adalah hastag(#) yang ramah url dan $1 adalah hasil dari pencarian
    //jadi yang dipakai diatas namanya adalh regular expresion, jika menemukan hastag $1 diganti dengan
    // semua kata hastagnya
    el.innerHTML = renderedText; //dan ganti element yang di loop tadi
});

// like tombol
function like(id) {
    const el = document.getElementById("post-btn-" + id);
    fetch("/like/" + id)
        .then((response) => response.json())
        // .then(data => console.log(data.status));
        .then((data) => {
            console.log(data.status);
            el.innerText = data.status == "LIKE" ? "unlike" : "like";
        });
}
