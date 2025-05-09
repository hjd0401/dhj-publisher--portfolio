var housing=['housing.jpg', 'rent.jpeg','rent1.png'];
var img_num=0;
var timer;

function slideshow(num)
{
    var image=document.getElementById("pic");
    img_num=img_num+num;
    if(img_num==housing.length)
    {
        img_num=0;
    }
    if(img_num<0)
    {
        img_num=housing.length-1;
    }
    image.src=housing[img_num];
}

function autoslide()
{
    timer=setInterval('slideshow(1)',5000);
}
