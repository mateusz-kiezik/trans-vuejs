<template>
    <v-container fluid>
        <v-card>

            <v-alert
                :value="alert"
                type="success"
                transition="scroll-y-reverse-transition"
            >
                {{ message }}
                <template v-slot:close="{ toggle }">
                    <v-icon @click="closeAlert(toggle)">mdi-close-circle</v-icon>
                </template>
            </v-alert>

            <v-card-title>
                {{ title }}
                <v-spacer></v-spacer>
                <v-btn to="/companies/add" color="primary" depressed>ADD</v-btn>
            </v-card-title>


        </v-card>
    </v-container>
</template>

<script>
export default {
    name: 'companies',
    data() {
        return {
            title: 'COMPANIES',
            alert: false,
            message: null,
        }
    },
    beforeMount() {
        if (this.$route.params.data) {
            this.alert = this.$route.params.data['alert']
            this.message = this.$route.params.data['message']
            setTimeout(() => {
                this.alert = false
                this.message = null
            }, 3000)
        }
    },
    methods: {
        closeAlert(toggle) {
            toggle()
        }
    }
}
</script>
