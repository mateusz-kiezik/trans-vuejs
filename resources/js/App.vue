<template>
    <v-app>
        <v-container fluid>
            <!--        <v-navigation-drawer app>-->

            <!--        </v-navigation-drawer>-->

            <v-app-bar app>
                <router-link to="/">
                    <v-img
                        class="me-5"
                        src="https://viral.com.pl/image/logo.png"
                        max-height="80"
                        max-width="80"
                        contain
                    ></v-img>
                </router-link>

                <v-btn to="/" text>
                    <v-icon left>mdi-home</v-icon>
                    Home
                </v-btn>

                <v-btn to="/users" text>
                    <v-icon left>mdi-account-multiple</v-icon>
                    Users
                </v-btn>

                <v-btn to="/companies" text>
                    <v-icon left>mdi-home-city</v-icon>
                    Companies
                </v-btn>
            </v-app-bar>

            <v-main>
                <v-container fluid>
                    <router-view></router-view>
                </v-container>
            </v-main>

            <v-footer app>

            </v-footer>

        </v-container>
    </v-app>
</template>

<script>
export default {}
</script>
