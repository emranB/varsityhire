<style>
ul#exampleSlider{
  position: absolute;
  left: 0%;
  right: 0%;
  top: 10.5%;
  bottom: 0%;
  z-index: -1;
  opacity: 0.7;
  list-style: none;
}
ul#exampleSlider li img{
  width: 100%;
  height: 1100px;
  background-size: cover;
}
ul#exampleSlider{
  background-attachment:  fixed;
}

@media only screen and (max-width: 700px){
  ul#exampleSlider{
    position: absolute;
    left: 0%;
    right: 0%;
    margin-top: 105%;
  }
  ul#exampleSlider li img{
    width: 90%;
    height: 400px;
    border-radius: 50%;
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
$(document).ready(function(){

    /* SET PARAMETERS */
    var change_img_time     = 2300;
    var transition_speed    = 700;

    var simple_slideshow    = $("#exampleSlider"),
        listItems           = simple_slideshow.children('li'),
        listLen             = listItems.length,
        i                   = 0;

        changeList = function () {

            listItems.eq(i).fadeOut(transition_speed, function () {
                i += 1;
                if (i === listLen) {
                    i = 0;
                }
                listItems.eq(i).fadeIn(transition_speed);
            });

        };

    listItems.not(':first').hide();
    setInterval(changeList, change_img_time);

});
</script>


<ul id="exampleSlider" class="row">
    <li><img src="pics/carousel/3.jpeg" alt="" /></li>
    <li><img src="pics/carousel/5.jpeg" alt="" /></li>
    <li><img src="pics/carousel/6.jpeg" alt="" /></li>
    <li><img src="pics/carousel/7.jpeg" alt="" /></li>
    <li><img src="pics/carousel/9.jpeg" alt="" /></li>
</ul>
