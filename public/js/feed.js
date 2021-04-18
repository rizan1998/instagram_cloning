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
    // const tolerantDistance = 100;

    // ambil postTime data ini berbentuk array
    postTime = document.getElementsByClassName("post_time");
    // ambil lastSPostime dari element html, lalu ambil nilai atribute value
    lastPostTime = postTime[postTime.length - 1].value;
    // ambil isi dari atribute value
    console.log(lastPostTime);

    if (scrollPoint >= bodyHeight) {
        //bisa pakai nilai tolerant dengan dikurangi nilai tolerant
        // filter agar tidak ter fetch beberapa kali
        // untuk memfilternya ubah value pada atribute value html menjadi string
        if (lastFetchTime != lastPostTime) {
            fetch("/loadmore/" + lastPostTime)
                .then((response) => response.json())
                .then((data) => {
                    // console.log(data.post);

                    // console.log(lastFetchTime);

                    for (let i = 0; i < data.post.length; i++) {
                        let newPost = renderPost(data.post[i]);
                        document
                            .getElementById("post-wrapper")
                            .insertAdjacentHTML("beforeend", newPost);
                    }

                    console.log("load more...");
                    lastFetchTime = lastPostTime;
                })
                .catch((err) => console.log(err));
        }
    }
};

function getAvatar(user) {
    let avatar_url =
        user.avatar != null
            ? "/images/avatar/" + user.avatar
            : "https://ui-avatars.com/api/?background=random&size=128&rounded=true&name=" +
              user.username;

    return `<img src="${avatar_url}" class="rounded-circle" alt="foto porfil ${user.username}" width="32" height="32">`;
}

function renderPost(post) {
    console.log(post);
    const avatar = getAvatar(post.user);

    return ` 
        <div>
            <div>
                <p>
                    ${avatar}
                    <a href="/@${post.user.username}">@${post.user.username}<a/>
                </p>

                <img src="/images/posts/${post.image}" alt="${post.caption}"
                width="100%" height="auto" ondbclick="like(${
                    post.id
                }, 'POST', 'post')"/>

                <p class="mb-0">
                    <span class='captions'> ${
                        post.caption != null ? post.caption : ""
                    }</span>
                </p>

                <span class="total_count" id="post-likescount-${post.id}">
                    ${post.likes_count}</span>

                <a class="text-dark" onclick="like(${
                    post.id
                }, 'POST', 'post')" id="post-btn-${post.id}">
                    ${post.like_status}
                </a> -

                <a class="text-dark" href="/posts/${post.id}"> Komentar </a>
            </div>
            <input type="hidden" class='post_time' value="${post.post_time}">
            <br>
        </div>
    `;
}

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
