/*
|-------------------------------------------------------------------------------
| VUEX modules/theatre_complexes.js
|-------------------------------------------------------------------------------
| The Vuex data store for the theatre_compplexes

* status = 0 -> No loading has begun
* status = 1 -> Loading has started
* status = 2 -> Loading completed successfully
* status = 3 -> Loading completed unsuccessfully
*/


import TheatreComplexAPI from '../api/theatre_complex.js';

export const theatre_complexes = {
    /*
    Defines the state being monitored for the module.
      */
    state: {
        complexes: [],
        complexesLoadStatus: 0,
        
        complex: {},
        complexLoadStatus: 0,
    },

    // list of actions
    /**
     * each methods contains a destructured argument called commit - passed by Vuex
     *  and allows us to commit mutations for our store
     */
    actions: {
        /*
        Loads the complexes from the API
        */
        load_theatre_complexes( { commit } ) {
            commit( 'setComplexesLoadStatus', 1 );

            TheatreComplexAPI.getComplexes()
                .then( function( response ){
                    commit( 'setComplexes', response.data );
                    commit( 'setComplexesLoadStatus', 2 );
                })
                .catch( function(){
                commit( 'setComplexes', [] );
                commit( 'setComplexesLoadStatus', 3 );
                });
        },
        load_theatre_complex( { commit } ) {
            commit( 'setComplexLoadStatus', 1 );
            CafeAPI.getCafe( data.id )
                .then( function( response ){
                commit( 'setComplex', response.data );
                commit( 'setComplexLoadStatus', 2 );
                })
                .catch( function(){
                commit( 'setComplex', {} );
                commit( 'setComplexLoadStatus', 3 );
                });
        },
    },
    /*
    Defines the mutations used
     */
    mutations: {
        setComplexesLoadStatus( state, status ){
          state.complexesLoadStatus = status;
        },
    
        setComplexes( state, complexes ){
          state.complexes = complexes;
        },
    
        setComplexLoadStatus( state, status ){
          state.complexLoadStatus = status;
        },
    
        setComplex( state, complex ){
          state.complex = complex;
        }
    },
    /*
    Defines the getters used by the module
    */
    getters: {
        getComplexesLoadStatus( state ){
          return state.complexesLoadStatus;
        },
    
        getComplexes( state ){
          return state.complexes;
        },
    
        getComplexLoadStatus( state ){
          return state.complexLoadStatus;
        },
    
        getComplex( state ){
          return state.complex;
        }
    }

}