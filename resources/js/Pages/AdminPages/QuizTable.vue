<template>
    <div class="">
        <!-- SEARCH -->
        <div class="flex items-center w-full justify-center mt-12">
            <input v-model="searchText" type="text" placeholder="Search..." class="px-4 py-2 mr-2 text-gray-700 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            <PrimaryButton @click="search()">Search</PrimaryButton>
        </div>

        <!-- QUIZ TABLE -->
        <div class="flex justify-center sm:mx-4">
            <ul class="flex flex-col my-10 mx-6 border-2 border-black bg-teal-100 w-auto overflow-x-auto">
                <li class="overflow-x-auto">
                    <div class="flex justify-between">
                        <!-- ID -->
                        <div
                            :class="{'w-12 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'id',
                                    'w-12 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'id'}"
                            @click="sortItems('id')"
                        >
                            <p>ID</p>
                            <svg xmlns="https://www.w3.org/2000/svg"
                                v-if="currentSort == 'id'"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                :class="{'w-4 h-4 ml-1 inline-block align-middle transform rotate-180 text-blue-600' : currentSortDir === 'asc',
                                        'w-4 h-4 ml-1 inline-block align-middle text-blue-600' : currentSortDir === 'desc'
                                        }"
                            >
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </div>

                        <!-- NAME -->
                        <div
                            :class="{'w-44 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'name',
                                    'w-44 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'name'}"
                            @click="sortItems('name')"
                        >
                            <p>Name</p>
                            <svg xmlns="https://www.w3.org/2000/svg"
                                v-if="currentSort == 'name'"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                :class="{'w-4 h-4 ml-1 inline-block align-middle transform rotate-180 text-blue-600' : currentSortDir === 'asc',
                                        'w-4 h-4 ml-1 inline-block align-middle text-blue-600' : currentSortDir === 'desc'
                                        }"
                            >
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </div>

                        <!-- EMAIL -->
                        <div
                            :class="{'w-64 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'email',
                                    'w-64 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'email'}"
                            @click="sortItems('email')"
                        >
                            <p>Email</p>
                            <svg xmlns="https://www.w3.org/2000/svg"
                                v-if="currentSort == 'email'"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                :class="{'w-4 h-4 ml-1 inline-block align-middle transform rotate-180 text-blue-600' : currentSortDir === 'asc',
                                        'w-4 h-4 ml-1 inline-block align-middle text-blue-600' : currentSortDir === 'desc'
                                        }"
                            >
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </div>

                        <!-- RESPONSES -->
                        <div
                            class="w-64 text-center text-2xl font-semibold">Responses</div>
                    </div>
                </li>

                <li class="overflow-y-auto overflow-x-auto max-h-96">
                    <QuizTableRow v-for="user in userList" :user="user" :key="user.id" />
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    import QuizTableRow from '../../Components/QuizTableRow.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';

    export default {
        data() {
            return {
                userList: this.usersList,
                sortDirection: 'asc',
                currentSort: 'id',
                currentSortDir: 'asc',
                searchText: ''
            }
        },
        components: {
            QuizTableRow,
            PrimaryButton
        },
        props: {
            user: Object,
            usersList: Array
        },
        methods: {
            sortItems(sort) {
                this.sortDirection = this.getSortDirection(sort);
                this.currentSort = sort;
                axios.get('/sortQuizTableRows', {
                    params: {
                        sort: sort,
                        direction: this.sortDirection,
                        search: this.searchText
                    }
                })
                    .then(response => {
                        this.userList = response.data.users;
                        this.currentSort = response.data.sort;
                        this.currentSortDir = response.data.direction;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            getSortDirection(sort) {
                if (sort == this.currentSort) {
                    return this.currentSortDir == 'asc' ? 'desc' : 'asc';
                } else {
                    return 'asc';
                }
            },
            search() {
                if (this.searchText == "") {
                    window.location.pathname = "/admin"
                } else {
                    axios.get('/searchQuizTableRows', {
                        params: {
                            search: this.searchText
                        }
                    })
                    .then(response => {
                        this.userList = response.data.users;
                        this.searchText = response.data.search
                    })
                    .catch(error => {
                        console.log(error);
                    })
                }
            }
        }
    }


</script>
