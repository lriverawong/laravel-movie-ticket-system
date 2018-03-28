<template>
    <div id="register" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form id="register" method="POST">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" v-model="name">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="lName" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="lName" type="text" v-model="lName">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" v-model="email">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" v-model="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" v-model="passwordConfirm">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone-Number</label>

                                <div class="col-md-6">
                                    <input id="phonenumber" type="phonenumber" v-model="phoneNumber">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="aptNumber" class="col-md-4 col-form-label text-md-right">Apartment Number</label>

                                <div class="col-md-6">
                                    <input id="aptNumber" type="aptNumber" v-model="aptNumber">
                                </div>
                            </div>

                              <div class="form-group row">
                                <label for="streetNumber" class="col-md-4 col-form-label text-md-right">Street Number</label>

                                <div class="col-md-6">
                                    <input id="streetNumber" type="streetNumber" v-model="streetNumber">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="streetName" class="col-md-4 col-form-label text-md-right">Street Name</label>

                                <div class="col-md-6">
                                    <input id="streetName" type="streetName" v-model="streetName">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="city" v-model="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <input id="country" type="country" v-model="country">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postalCode" class="col-md-4 col-form-label text-md-right">Postal Code</label>
                                
                                <div class="col-md-6">
                                    <input id="postalCode" type="postalCode" v-model="postalCode">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>