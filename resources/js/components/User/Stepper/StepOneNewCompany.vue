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
                <v-col cols="4">
                    <v-text-field
                        v-model="company.name"
                        :counter="50"
                        label="Company name"
                        :rules="nameRules"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="2">
                    <v-text-field
                        v-model="company.tax"
                        label="Tax number"
                        :rules="taxRules"
                        reqired
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row justify="center">
                <v-col cols="1">
                    <v-autocomplete
                        v-model="company.country"
                        :items="countries"
                        label="Country"
                        :rules="countryRules"
                        required
                    ></v-autocomplete>
                </v-col>

                <v-col cols="2">
                    <v-text-field
                        v-model="company.street"
                        label="Street"
                        :rules="streetRules"
                        reqired
                    ></v-text-field>
                </v-col>

                <v-col cols="1">
                    <v-text-field
                        v-model="company.postal"
                        label="Postal code"
                        :rules="postalRules"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="2">
                    <v-text-field
                        v-model="company.city"
                        label="City"
                        :rules="cityRules"
                        required
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row justify="center">
                <v-col cols="2">
                    <v-text-field
                        v-model="company.phone"
                        label="Phone number"
                        :rules="phoneRules"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="2">
                    <v-text-field
                        v-model="company.email"
                        label="Email"
                        :rules="emailRules"
                        required
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row justify="center" class="mb-16">
                <v-col cols="5" class="d-flex justify-end">
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
    name: 'stepOneNewCompany',
    data() {
        return {
            title: 'CREATE NEW COMPANY',
            valid: false,
            company: {
                name: '',
                country: null,
                street: '',
                postal: '',
                city: '',
                phone: '',
                email: '',
                tax: ''
            },
            countries: [
                {text: 'Poland', value: 'PL'},
                {text: 'Albania', value: 'AL'},
                {text: 'Andorra', value: 'AD'},
                {text: 'Austria', value: 'AT'},
                {text: 'Belgium', value: 'BE'},
                {text: 'Bulgaria', value: 'BG'},
                {text: 'Bosnia and Herzegovina', value: 'BA'},
                {text: 'Belarus', value: 'BY'},
                {text: 'Switzerland', value: 'CH'},
                {text: 'Cyprus', value: 'CY'},
                {text: 'Czechia', value: 'CZ'},
                {text: 'Germany', value: 'DE'},
                {text: 'Denmark', value: 'DK'},
                {text: 'Estonia', value: 'EE'},
                {text: 'Finland', value: 'FI'},
                {text: 'France', value: 'FR'},
                {text: 'Great Britain', value: 'GB'},
                {text: 'Greece', value: 'GR'},
                {text: 'Croatia', value: 'HR'},
                {text: 'Hungary', value: 'HU'},
                {text: 'Ireland', value: 'IE'},
                {text: 'Iceland', value: 'IS'},
                {text: 'Italy', value: 'IT'},
                {text: 'Lithuania', value: 'LT'},
                {text: 'Luxembourg', value: 'LU'},
                {text: 'Latvia', value: 'LV'},
                {text: 'Monaco', value: 'MC'},
                {text: 'Moldova', value: 'MD'},
                {text: 'Malta', value: 'MT'},
                {text: 'Montenegro', value: 'ME'},
                {text: 'Netherlands', value: 'NL'},
                {text: 'Norway', value: 'NO'},
                {text: 'Romania', value: 'RO'},
                {text: 'San Marino', value: 'SM'},
                {text: 'Serbia', value: 'RS'},
                {text: 'Slovakia', value: 'SK'},
                {text: 'Slovenia', value: 'SI'},
                {text: 'Sweden', value: 'SE'},
                {text: 'Ukraine', value: 'UA'},
            ],
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 50) || 'Name must be less than 50 characters'
            ],
            countryRules: [
                v => !!v || 'Country is required'
            ],
            streetRules: [
                v => !!v || 'Street is required'
            ],
            postalRules: [
                v => !!v || 'Postal code is required'
            ],
            cityRules: [
                v => !!v || 'City is required'
            ],
            phoneRules: [
                v => !!v || 'Phone number is required'
            ],
            emailRules: [
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'Email must be valid'
            ],
            taxRules: [
                v => !!v || 'Tax number is required'
            ]
        }
    },
    methods: {
        validate() {
            let valid = this.$refs.form.validate();
            if (valid) {
                this.$emit('nextStep', 2)
                this.$emit('company', this.company)
            }
            // this.axios
            //     .post('/api/company/new', this.company).then(response => {
            //     this.$router.push({name: 'companies', params: {data: response.data}})
            // }).catch(error => {
            //     console.log(error)
            // })
        }
    }
}
</script>
