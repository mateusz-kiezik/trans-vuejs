<template>
        <v-card flat>
            <v-card-title>
                {{ title }}
            </v-card-title>


            <v-card flat>
                <v-form
                    v-model="valid"
                    ref="form"
                    lazy-validation
                >

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-text-field
                                v-model="user.name"
                                :counter="40"
                                label="Name"
                                :rules="nameRules"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-text-field
                                v-model="user.email"
                                label="Email"
                                :rules="emailRules"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-text-field
                                v-model="user.phone"
                                label="Phone number"
                                :rules="phoneRules"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-select
                                v-model="user.role"
                                :items="roles"
                                label="Role"
                                :rules="roleRules"
                                required
                            ></v-select>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="1">
                            <v-btn
                                :disabled="!valid"
                                color="success"
                                class="mr-4"
                                @click="validate"
                            >
                                SAVE
                            </v-btn>
                        </v-col>
                    </v-row>


                </v-form>
            </v-card>


        </v-card>
</template>

<script>
export default {
    name: 'addUser',
    data() {
        return {
            title: 'NEW USER',
            valid: false,
            user: {
                name: '',
                email: '',
                phone: '',
                role: null,
            },
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 40) || 'Name must be less than 40 characters'
            ],
            emailRules: [
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'Email must be valid'
            ],
            phoneRules: [
                v => !!v || 'Phone number is required',
            ],
            roleRules: [
                v => !!v || 'Role is required'
            ],
            roles: [
                {value: 1, text: 'User'},
                {value: 2, text: 'Forwarder'},
                {value: 3, text: 'Admin'}
            ]
        }
    },
    methods: {
        validate() {
            this.$refs.form.validate();
            this.axios
                .post('/api/users/new', this.user).then(response=>{
                    this.$router.push({name: 'users'})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
