var currentIndex = 0;

var feeChange = [50, 75, 100];

var feeElement = document.getElementById('fee');


window.onload = function() {

    feeElement.textContent = 'Fee: ' + feeChange[Math.floor(Math.random() * feeChange.length)];

};

        var images = document.querySelectorAll('.slider img');

        var feeElement = document.getElementById('fee');


        function showNextImage() {

            images[currentIndex].style.display = 'none';

            currentIndex = (currentIndex + 1) % images.length;

            images[currentIndex].style.display = 'block';


            // update the fee based on the current image

            var fees = [50, 75, 100]; // define your fees here

            feeElement.textContent = 'Fee: ' + fees[currentIndex];

        }


        // Show the next image every 3 seconds

        setInterval(showNextImage, 3000);