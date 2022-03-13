<template>
    <v-container fluid>
        <v-card>

            <v-card-title>
                {{ title }}
                <v-spacer></v-spacer>
                <v-btn to="/users/add" color="primary" depressed>ADD</v-btn>
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
                            <component :is="item.content"></component>
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
            items: [
                {tab: 'All', content: 'All'},
                {tab: 'Admins', content: 'Admins'},
                {tab: 'Forwarders', content: 'Forwarders'},
                {tab: 'Users', content: 'Users'}
            ]
        }
    }
}
</script>
