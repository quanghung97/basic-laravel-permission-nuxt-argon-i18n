import axios from 'axios'
import https from 'https'

let instance = axios.create({
    baseURL: 'https://firsttraining.test/api/',
    //Authorize https dont have CA so disable each axios request
    httpsAgent: new https.Agent({ rejectUnauthorized: false })
})

export default instance
