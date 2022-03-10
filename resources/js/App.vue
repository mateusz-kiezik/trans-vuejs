<template>
    <v-app>
        <v-navigation-drawer app>

        </v-navigation-drawer>

        <v-app-bar app>
            <router-link to="/">
                <v-img
                    class="me-5"
                    src="https://viral.com.pl/image/logo.png"
                    max-height="100"
                    max-width="100"
                    contain
                ></v-img>
            </router-link>

            <v-btn to="/" text>
                <v-icon left>mdi-home</v-icon>
                HOME
            </v-btn>

            <v-btn to="/users" text>
                <v-icon left>mdi-account-multiple</v-icon>
                USERS
            </v-btn>

        </v-app-bar>


        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>


        <v-footer app>

        </v-footer>
    </v-app>
</template>

<script>
export default {}
</script>
