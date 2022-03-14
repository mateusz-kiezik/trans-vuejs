<template>
    <v-data-table
        :headers="headers"
        :items="users"
        :items-per-page="10"
        :loading="loadingTable"
        :loading-text="loadingTableText"
        :no-data-text="emptyTableText"
        :loader-height="6">

        <template v-slot:item.actions="{ item }">

            <v-tooltip left>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        :to='{name: "editUser", params: {id: item.id}}'
                        icon
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                </template>
                <span>Edit</span>
            </v-tooltip>

            <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        @click="deleteUser(item.id)"
                        icon
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </template>
                <span>Delete</span>
            </v-tooltip>

        </template>
    </v-data-table>
</template>

<script>
import { bus } from '../../app.js';

export default {
    name: 'userUsers',
    data() {
        return {
            loadingTable: true,
            emptyTableText: 'No data to show',
            loadingTableText: "Loading... Please wait",
            headers: [
                {text: 'Name', value: 'name', divider: true },
                {text: 'Email', value: 'email', divider: true },
                {text: 'Phone', value: 'phone', sortable: false, divider: true },
                {text: 'Company', value: 'company_data.name', divider: true},
                {text: 'Actions', value: 'actions', sortable: false}
            ],
            users: []
        }
    },
    beforeMount() {
        this.getUsers()

        bus.$on('refreshComponents', event => {
            this.getUsers()
            console.log('dupa')
        })
    },
    methods: {
        async getUsers() {
            await this.axios.get('/api/users/1').then(response => {
                this.users = response.data
                this.loadingTable = false
            }).catch(error => {
                console.log(error)
                this.users = []
            })
        },
        deleteUser(userId) {
            if (confirm('Are you sure to delete this user?')) {
                this.axios.post('/api/user/delete', {id: userId}).then(response => {
                    this.$emit('refresh')
                    this.$emit('showAlert', response.data['message'])
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>
