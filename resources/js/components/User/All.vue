<template>
    <v-data-table
        :headers="headers"
        :items="users"
        :items-per-page="10"
        :loading="loadingTable"
        :loading-text="loadingTableText"
        :no-data-text="emptyTableText"
        :loader-height="6">
    </v-data-table>


    <!--    <v-container fluid>-->
    <!--        <div :class="['display-2']" v-text="title"></div>-->

    <!--    <div class="container">-->
    <!--        <h2 class="text-center">Users List</h2>-->
    <!--        <router-link to="/users/add" class="btn btn-primary">Add</router-link>-->
    <!--        <v-alert type="success" v-if="message">{{ message }}</v-alert>-->
    <!--        <table class="table">-->
    <!--            <thead>-->
    <!--            <tr>-->
    <!--                <th>Name</th>-->
    <!--                <th>E-mail</th>-->
    <!--                <th>Status</th>-->
    <!--                <th>Role</th>-->
    <!--                <th>Action</th>-->
    <!--            </tr>-->
    <!--            </thead>-->

    <!--            <tbody v-if="users.length > 0">-->
    <!--            <tr v-for="(user, key) in users" :key="key">-->
    <!--                <td>{{ user.name }}</td>-->
    <!--                <td>{{ user.email }}</td>-->
    <!--                <td>{{ user.status }}</td>-->
    <!--                <td>{{ user.role }}</td>-->
    <!--                <td>-->
    <!--&lt;!&ndash;                    <router-link to="{name:'userEdit', params:{id:user.id}}" class="btn btn-success">Edit</router-link>&ndash;&gt;-->
    <!--                    <button type="button" @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>-->
    <!--                </td>-->
    <!--            </tr>-->
    <!--            </tbody>-->

    <!--            <tbody v-else>-->
    <!--            <tr>-->
    <!--                <td colspan="5" align="center">No users found</td>-->
    <!--            </tr>-->
    <!--            </tbody>-->

    <!--        </table>-->
    <!--    </div>-->


    <!--    </v-container>-->
</template>

<script>
export default {
    name: 'userAll',
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
                {text: 'Role', value: 'role', sortable: false }
            ],
            users: []
        }
    },
    beforeMount() {
        this.getUsers()
    },
    methods: {
        async getUsers() {
            await this.axios.get('/api/users/').then(response => {
                this.users = response.data
                this.loadingTable = false
            }).catch(error => {
                console.log(error)
                this.users = []
            })
        }
    }
}
</script>
