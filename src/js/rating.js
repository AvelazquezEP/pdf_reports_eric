var log = console.log;

const getStars = (star_element) => {

    const statusRating = document.getElementById('statusRating');

    star_value = document.getElementById(star_element).value;

    statusRating.value = star_value;
    // log(document.getElementById('statusRating').value);
}