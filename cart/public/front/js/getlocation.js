const findMyState = () => {
    const state = document.querySelector('.hstate');

    const success = (postion) => {
        console.log(postion);
        const latitude = postion.coords.latitude;
        const longitude = postion.coords.longitude;

        const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=ar`
        
        // تجربه منطقه بداخل السعوديه
        // const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=25.994478&longitude=45.318161&localityLanguage=ar`

        fetch(geoApiUrl)
        .then(res => res.json())
        .then(data => {
           console.log(data);
           state.textContent = data.localityInfo.administrative[1].name + ' - ' + data.locality + ' - ' + data.countryName;
           document.querySelector('.get-state').classList.add("d-none");
        })
    }
    const error = () => {
        toastr.options.progressBar = true;
        toastr.error('', 'لا يمكننا تحديد مكانك! برجاء تمكين الموقع لنا في المتصفح لديك')
    }

    navigator.geolocation.getCurrentPosition(success, error);
}

document.querySelector('.get-state').addEventListener('click', findMyState)