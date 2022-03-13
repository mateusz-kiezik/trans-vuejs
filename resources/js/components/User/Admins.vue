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

            <v-btn :to='{name: "editUser", params: {id: item.id}}' icon>
                <v-icon>mdi-pencil</v-icon>
            </v-btn>

            <v-btn icon @click="deleteUser(item.id)">
                <v-icon>mdi-delete</v-icon>
            </v-btn>

        </template>

    </v-data-table>
</template>

<script>
export default {
    name: 'userAdmins',
    data() {
        return {
            loadingTable: true,
            emptyTableText: 'No data to show',
            loadingTableText: "Loading... Please wait",
            headers: [
                {text: 'Name', value: 'name', divider: true },
                {text: 'Email', value: 'email', divider: true },
                {text: 'Phone', value: 'phone', sortable: false, divider: true },
                {text: 'Company', value: 'company', divider: true },
                {text: 'Actions', value: 'actions', sortable: false}
            ],
            users: []
        }
    },
    beforeMount() {
        this.getUsers()
        this.$root.$refs.Admins = this
    },
    methods: {
        async getUsers() {
            await this.axios.get('/api/users/3').then(response => {
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
                    this.getUsers()
                    this.$root.$refs.All.getUsers()
                    this.$root.$refs.Users.getUsers()
                    this.$root.$refs.Forwarders.getUsers()

                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>
