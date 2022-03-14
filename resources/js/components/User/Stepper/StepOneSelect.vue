<template>
    <v-card flat>
        <v-card-title class="justify-center mb-8">
            {{ title }}
        </v-card-title>

        <v-row justify="center">
            <v-col cols="6">
                <v-form
                    v-model="valid"
                    ref="form"
                    lazy-validation
                >
                    <v-autocomplete
                        v-model="company.id"
                        :items="companies"
                        :item-text="item =>
                        item.name +' [' + item.country + item.tax_number + ']'"
                        :item-value="item => item.id"
                        label="Select company"
                        :rules="companyRules"
                        required
                        clearable
                    >
                    </v-autocomplete>
                </v-form>
            </v-col>
        </v-row>

        <v-row justify="center" class="mb-4">
            <v-col cols="6">
                <div>or</div>
            </v-col>
        </v-row>

        <v-row justify="center" class="mb-16">
            <v-col cols="2" class="d-flex justify-start">
                <v-btn
                    color="secondary"
                    @click="newCompany"
                >
                    ADD NEW
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
                    color="primary"
                    @click="validate"
                    :disabled="!valid"
                >
                    NEXT
                </v-btn>
            </v-col>
        </v-row>
    </v-card>
</template>

<script>
export default {
    name: 'stepOneSelect',
    data() {
        return {
            title: 'COMPANY',
            valid: false,
            companies: [],
            company: {
                id: ''
            },
            companyRules: [
                v => !!v || 'Select company or add new'
            ]
        }
    },
    beforeMount() {
        this.getCompanies()
    },
    methods: {
        getCompanies() {
            this.axios.get('/api/companies-base').then(response => {
                this.companies = response.data
            }).catch(error => {
                console.log(error)
            });
        },
        validate() {
            let valid = this.$refs.form.validate()
            if (valid) {
                this.$emit('nextStep', 2)
                this.$emit('company', this.company)
            }
        },
        newCompany() {
            this.$emit('newCompany')
        }

    }
}
</script>
