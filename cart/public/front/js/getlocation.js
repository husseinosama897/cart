const findMyState = () => {
    const state = document.querySelector('.status');

    const success = (postion) => {
        console.log(postion);
        const latitude = postion.coords.latitude;
        const longitude = postion.coords.longitude;

        const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=ar`

        fetch(geoApiUrl)
        .then(res => res.json())
        .then(data => {
           console.log(data);
        })
    }
    const error = () => {
        toastr.options.progressBar = true;
        toastr.error('', 'لا يمكننا تحديد مكانك! برجاء تمكين الموقع لنا في المتصفح لديك')
    }

    navigator.geolocation.getCurrentPosition(success, error);
}

document.querySelector('.get-state').addEventListener('click', findMyState)