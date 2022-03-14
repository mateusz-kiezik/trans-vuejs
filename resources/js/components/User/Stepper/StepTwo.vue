<template>
    <v-card flat>
        <v-card-title class="justify-center mb-8">
            {{ title }}
        </v-card-title>

        <v-form
            v-model="valid"
            ref="form"
            lazy-validation
        >
            <v-row justify="center">
                <v-col cols="3">
                    <v-text-field
                        v-model="user.firstName"
                        :counter="30"
                        label="First name"
                        :rules="nameRules"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="3">
                    <v-text-field
                        v-model="user.lastName"
                        :counter="30"
                        label="Last name"
                        :rules="nameRules"
                        required
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row justify="center">
                <v-col cols="3">
                    <v-text-field
                        v-model="user.phone"
                        label="Phone number"
                        :rules="phoneRules"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="3">
                    <v-text-field
                        v-model="user.email"
                        label="Email"
                        :rules="emailRules"
                        required
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row justify="center" class="mb-16">
                <v-col cols="2" class="d-flex justify-start">
                    <v-btn
                        color="secondary"
                        @click="prevStep"
                    >
                        BACK
                    </v-btn>
                </v-col>

                <v-col cols="3" class="d-flex justify-end">
                    <v-btn
                        to="/users"
                        text
                    >
                        CANCEL
                    </v-btn>
                </v-col>

                <v-col cols="1" class="d-flex justify-end">
                    <v-btn
                        :disabled="!valid"
                        color="primary"
                        @click="validate"
                    >
                        NEXT
                    </v-btn>
                </v-col>
            </v-row>
        </v-form>
    </v-card>
</template>

<script>
export default {
    name: 'stepTwo',
    data() {
        return {
            title: 'CREATE NEW USER',
            valid: false,
            user: {
                firstName: '',
                lastName: '',
                phone: '',
                email: ''
            },
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 30) || 'Name must be less than 30 characters'
            ],
            emailRules: [
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'Email must be valid'
            ],
            phoneRules: [
                v => !!v || 'Phone number is required',
            ],
        }
    },
    methods: {
        validate() {
            let valid = this.$refs.form.validate();
            if (valid) {
                this.$emit('nextStep', 3)
                this.$emit('user', this.user)
            }
        },
        prevStep() {
            this.$emit('prevStep', 1)
        }
    }
}
</script>
