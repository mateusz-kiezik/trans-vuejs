<template>
    <v-card flat>
        <v-card-title class="justify-center mb-8">
            {{ title }}
        </v-card-title>

        <v-row>
            <v-col>
                <v-card-text class="text-center">Do you confirm?</v-card-text>
            </v-col>
        </v-row>

        <v-row justify="center" class="mb-16">
            <v-col cols="3" class="d-flex justify-start">
                <v-btn
                    color="secondary"
                    @click="prevStep"
                >
                    BACK
                </v-btn>
            </v-col>

            <v-col cols="3" class="d-flex justify-end">
                <v-btn
                    color="primary"
                    @click="save"
                >
                    SAVE
                </v-btn>
            </v-col>
        </v-row>
    </v-card>
</template>

<script>
export default {
    name: 'stepThree',
    data() {
        return {
            title: 'CONFIRM'
        }
    },
    methods: {
        prevStep() {
            this.$emit('prevStep', 2)
        },
        save() {
            this.$emit('save')
        }
    }
}
</script>
