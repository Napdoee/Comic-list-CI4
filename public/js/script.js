function previewImg()
{
    let cover = document.querySelector('#cover');
    let img = document.querySelector('#imgPreview');

    const fileReader = new FileReader();
    if(!cover.files[0]){
        //I don't know how to get Base URL ci4 in JS
        //So here the code...
        img.src = '/ci4app/public/img/default.png'
    } else {
        fileReader.readAsDataURL(cover.files[0]);
    
        fileReader.onload = function(e){
            img.src = e.target.result;
        }
    }
}