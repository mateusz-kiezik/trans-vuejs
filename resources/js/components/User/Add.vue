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
                                v-model="name"
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
                                v-model="email"
                                label="Email"
                                :rules="emailRules"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-text-field
                                v-model="phone"
                                label="Phone number"
                                :rules="phoneRules"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row justify="center">
                        <v-col cols="4">
                            <v-select
                                v-model="role"
                                :items="roles.name"
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
    </v-container>
</template>

<script>
export default {
    name: 'addUser',
    data() {
        return {
            title: 'NEW USER',
            valid: false,
            name: '',
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 40) || 'Name must be less than 40 characters'
            ],
            email: '',
            emailRules: [
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'Email must be valid'
            ],
            phone: '',
            phoneRules: [
                v => !!v || 'Phone number is required',
            ],
            role: null,
            roleRules: [
                v => !!v || 'Role is required'
            ],
            roles: [
                {id: 1, name: 'User'},
                {id: 2, name: 'Forwarder'},
                {id: 3, name: 'Admin'}
            ]
        }
    },
    methods: {
        validate() {
            this.$refs.form.validate();
            this.axios
                .post('/api/users/new')
        }
    }
}
</script>
