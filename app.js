

// BENTOの説明
// $('.bg-image').hover(function () {
//         $('.content', this).animate({
//             top: "75px"
//         }, 500);
//     }, function () {
//         $('.content', this).animate({
//             top: "150px"
//         }, 500);
// });

$('.bg-image').hover(function() {
    $("#mean").slideDown(2000);
});



$("#btn1").on("click",function(){
  　$("#image").slideToggle(300);

});

$("#save").on("click",function(){
  const value = $("#image").val(); 
   localStorage.setItem("record" , value);
   alert("DONE!");
  });
  


// 記録メモ
$("#btn1").on("click",function(){
        　$("#form-group").slideToggle(300);
    
});

// function previewFile(file) {
//     // プレビュー画像を追加する要素
//     const preview = document.getElementById('preview');
  
//     // FileReaderオブジェクトを作成
//     const reader = new FileReader();
  
//     // ファイルが読み込まれたときに実行する
//     reader.onload = function (e) {
//       const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
//       const img = document.createElement("img"); // img要素を作成
//       img.src = imageUrl; // 画像のURLをimg要素にセット
//       preview.appendChild(img); // #previewの中に追加
//     }
  
//     // いざファイルを読み込む
//     reader.readAsDataURL(file);
//   }
  
  
  // // <input>でファイルが選択されたときの処理
  // const fileInput = document.getElementById('upfile');
  // const handleFileSelect = () => {
  //   const files = fileInput.files;
  //   for (let i = 0; i < files.length; i++) {
  //     previewFile(files[i]);
  //   }
  // }
  // fileInput.addEventListener('change', handleFileSelect);








