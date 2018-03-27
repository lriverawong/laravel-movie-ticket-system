/*
    Imports the Roast API URL from the config.
*/
import { OMTS_CONFIG } from '../config.js';

export default {
    /*
        GET     /api/v1/theatre-complexes
    */
    getComplexes: function(){
        return axios.get( OMTS_CONFIG.API_URL + '/theatre_complexes' );
    },
    /*
    GET   /api/v1/theatre_complexes/{theatreComplexID}
    */
    getComplex: function( tComplexID ){
        return axios.get( OMTS_CONFIG.API_URL + '/theatre_complexes/' + tComplexID );
    },
    /*
    POST  /api/v1/theatre_complexes
    */
    // postAddNewComplex: function( name, phone_num, street_num, street_name, city, province, country, postal_code, num_theatres ){
    postAddNewComplex: function( name, phone_num, street_num, street_name, city, province, country, postal_code ){
        return axios.post( OMTS_CONFIG.API_URL + '/theatre_complexes', {
            name: name,
            phone_num: phone_num, 
            street_num: street_num,
            street_name: street_name,
            city: city,
            province: province,
            country: country,
            postal_code: postal_code,
            // num_theatres: num_theatres
        });
    }
}