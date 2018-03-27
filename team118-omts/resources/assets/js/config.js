/*
    Defines the API route we are using.
*/
var api_url = '';

switch( process.env.NODE_ENV ){
  case 'development':
    api_url = 'https://localhost/api/v1';
  break;
}

export const OMTS_CONFIG = {
  API_URL: api_url,
}