<template>
    <v-container fluid>
        <v-stepper v-model="step">
            <v-stepper-header>
                <v-stepper-step
                    :complete="step > 1"
                    step="1"
                    color="orange"
                >
                    {{ stepOneText }}
                </v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step
                    :complete="step > 2"
                    step="2"
                    color="orange"
                >
                    {{ stepTwoText }}
                </v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step
                    :complete="step > 3"
                    step="3"
                    color="orange"
                >
                    {{ stepThreeText }}
                </v-stepper-step>
            </v-stepper-header>

            <v-stepper-items>
                <v-stepper-content step="1">
                    <v-slide-y-transition mode="out-in">
                        <component
                            v-bind:is="currentComponent"
                            v-on:newCompany="newCompany"
                            v-on:nextStep="nextStep"
                            v-on:company="setCompany"
                        ></component>
                    </v-slide-y-transition>
                </v-stepper-content>

                <v-stepper-content step="2">
                    <StepTwo
                        v-on:nextStep="nextStep"
                        v-on:user="setUser"
                        v-on:prevStep="prevStep"
                    />
                </v-stepper-content>

                <v-stepper-content step="3">
                    <StepThree
                        v-on:prevStep="prevStep"
                        v-on:save="save"
                    />
                </v-stepper-content>
            </v-stepper-items>
        </v-stepper>
    </v-container>
</template>

<script>
import StepOneSelect from './StepOneSelect';
import StepOneNewCompany from "./StepOneNewCompany";
import StepTwo from "./StepTwo";
import StepThree from "./StepThree";

export default {
    name: 'stepper',
    components: {
        StepOneSelect,
        StepOneNewCompany,
        StepTwo,
        StepThree
    },
    data() {
        return {
            step: 1,
            stepOneText: 'COMPANY DETAILS',
            stepTwoText: 'USER DETAILS',
            stepThreeText: 'FINISH',
            currentComponent: StepOneSelect,
            company: {},
            user: {}
        }
    },
    methods: {
        nextStep(step) {
            this.step = step
        },
        prevStep(step) {
            this.step = step
        },
        newCompany() {
            this.currentComponent = StepOneNewCompany
        },
        setCompany(company) {
            this.company = company
        },
        setUser(user) {
            this.user = user
        },
        save() {
                this.axios.post('/api/user/new', {user: this.user, company: this.company}).then(response => {
                    this.$router.push({name: 'users', params: {message: response.data['message'], alert: response.data['alert']}})
                }).catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
