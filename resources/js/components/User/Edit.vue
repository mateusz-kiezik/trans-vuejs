<template>
    <v-container fluid>
        <v-card>

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
                                disabled
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

                        <v-col cols="1">
                            <v-btn
                                to="/users"
                                color="primary"
                                class="mr-4"
                            >
                                CANCEL
                            </v-btn>
                        </v-col>
                    </v-row>


                </v-form>
            </v-card>


        </v-card>
    </v-container>
</template>

<script>
export default {
    name: 'editUser',
    data() {
        return {
            title: 'EDIT USER',
            valid: false,
            user: {},
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
    mounted() {
        this.getUser(this.$route.params.id);
    },
    methods: {
        validate() {
            this.$refs.form.validate();
            this.axios
                .post('/api/user/update', this.user).then(response => {
                this.$router.push({name: 'users'})
            }).catch(error=>{
                console.log(error)
            })
        },
        async getUser(id) {
            await this.axios.get('/api/user/' + id).then(response => {
                this.user = response.data
            })
        }
    }
}
</script>
