// infinite scroll

// biar tidak membuat element baru setiap scroll
let postTime = "";
let lastPostTime = "";
let lastFetchTime = ""; //sebagai parameter last fetch time
// ketika load atau bikin element diambilnya
window.onscroll = function () {
    // ambil total tinggi halaman
    const bodyHeight = document.body.scrollHeight;
    // ambil posisi scrollnya saat itu diambil dari scroll Y nya
    const scrollPoint = window.scrollY + window.innerHeight;
    // berikan angka toleransi jadi jika mau sampai bawah baru load
    const tolerantDistance = 100;

    // ambil postTime data ini berbentuk array
    postTime = document.getElementsByClassName("post_time");
    // ambil lastSPostime dari element html, lalu ambil nilai atribute value
    lastPostTime = postTime[postTime.length - 1].value;
    // ambil isi dari atribute value
    // console.log(lastPostTime.value);

    if (scrollPoint >= bodyHeight - tolerantDistance) {
        // filter agar tidak ter fetch beberapa kali
        // untuk memfilternya ubah value pada atribute value html menjadi string
        if (lastFetchTime != lastPostTime) {
            fetch("/loadmore/" + lastPostTime)
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    console.log("load more...");
                    lastFetchTime = lastPostTime;
                })
                .catch((err) => console.log(err));
        }
    }
};

// ambil id element container dan insert html setelahnya
// document
//     .getElementById("feedContainer")
//     .insertAdjacentHTML(
//         "beforeend",
//         "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>"
//     );

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
function like(id, type = "POST", id_el) {
    const el = document.getElementById(id_el + "-btn-" + id);
    let likesCount = document.getElementById(id_el + "-likescount-" + id);

    fetch("/like/" + type + "/" + id)
        .then((response) => response.json())
        // .then(data => console.log(data.status));
        .then((data) => {
            console.log(data.status);
            // el.innerText = data.status == "LIKE" ? "unlike" : "like";
            if (data.status == "LIKE") {
                currentCount = parseInt(likesCount.innerHTML) + 1;
                el.innerText = "unlike";
                // parseInt diubah dulu menjadi int
            } else {
                currentCount = parseInt(likesCount.innerHTML) - 1;
                el.innerText = "like";
            }

            likesCount.innerHTML = currentCount;
        });
    // karena diganti menggunakan link maka cegah link aktf
    return false;
}
