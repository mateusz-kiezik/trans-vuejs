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
<!--                <v-btn to="/users/add" color="primary" depressed>ADD</v-btn>-->
                <v-btn to="/user/new" color="primary" depressed>ADD</v-btn>
            </v-card-title>

            <v-tabs v-model="tab">
                <v-tabs-slider color="orange"></v-tabs-slider>
                <v-tab v-for="item in items" :key="item.tab">
                    {{ item.tab }}
                </v-tab>
            </v-tabs>

            <v-tabs-items v-model="tab">
                <v-tab-item v-for="item in items" :key="item.tab">
                    <v-card flat>
                        <v-card-text>
                            <component
                                :is="item.content"
                                v-on:showAlert="showAlert"
                                v-on:refresh="refreshComponents"
                            ></component>
                        </v-card-text>
                    </v-card>
                </v-tab-item>
            </v-tabs-items>

        </v-card>
    </v-container>
</template>

<script>
import All from './All.vue';
import Admins from './Admins.vue';
import Forwarders from './Forwarders.vue';
import Users from './Users.vue';
import { bus } from '../../app.js';

export default {
    name: 'users',
    components: {
        All,
        Admins,
        Forwarders,
        Users
    },
    data() {
        return {
            message: null,
            title: 'USERS',
            tab: null,
            alert: false,
            items: [
                {tab: 'All', content: 'All'},
                {tab: 'Admins', content: 'Admins'},
                {tab: 'Forwarders', content: 'Forwarders'},
                {tab: 'Users', content: 'Users'}
            ]
        }
    },
    methods: {
        showAlert(message) {
            this.message = message
            this.alert = true
            setTimeout(()=> {
                this.alert = false
                this.message = null
            }, 3000)
        },
        refreshComponents() {
            bus.$emit('refreshComponents')
        },
        closeAlert(toggle) {
            toggle()
        },
    }
}
</script>
