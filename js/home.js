window.onload = function () {
    
        function carousel() {
            var img = ['img/car1.jpg', 'img/car2.jpg', 'img/car3.jpg','img/car4.jpg'];
            var sources = ['category.php#home','category.php#pers', 'category.php#books', 'category.php'];
            var slider = document.getElementById('slider');
            var counter = 0;
            setInterval(function () {
                slider.parentElement.href = sources[counter];
                slider.src = img[counter];
                counter = (counter + 1) % img.length;
            }, 3000);
        }
    
        carousel();
    
    };