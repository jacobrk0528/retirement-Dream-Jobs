<template>
    <div class="flex justify-center">
        <ul class="flex flex-col my-10 mx-6 border-2 border-black bg-teal-100 w-full lg:w-3/4">
            <li>
                <div class="flex">
                    <!-- ID -->
                    <div
                        :class="{'w-1/6 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'id',
                                'w-1/6 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'id'}"
                        @click="sortItems('id')"
                    >
                        <p>ID</p>
                        <svg xmlns="http://www.w3.org/2000/svg"
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
                        :class="{'w-1/4 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'name',
                                'w-1/4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'name'}"
                        @click="sortItems('name')"
                    >
                        <p>Name</p>
                        <svg xmlns="http://www.w3.org/2000/svg"
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
                        :class="{'w-1/4 pl-4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800 text-blue-600' : currentSort === 'email',
                                'w-1/4 text-2xl font-semibold flex items-center justify-center cursor-pointer hover:text-blue-800' : currentSort !== 'email'}"
                        @click="sortItems('email')"
                    >
                        <p>Email</p>
                        <svg xmlns="http://www.w3.org/2000/svg"
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
                        class="w-1/2 text-center text-2xl font-semibold">Responses</div>
                </div>
            </li>

            <QuizTableRow v-for="user in userList" :user="user" :key="user.id" />
        </ul>
    </div>
</template>

<script>
    import QuizTableRow from '../../Components/QuizTableRow.vue';

    export default {
        data() {
            return {
                userList: this.usersList,
                sortDirection: 'asc',
                currentSort: 'id',
                currentSortDir: 'asc',
            }
        },
        components: {
            QuizTableRow,
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
                        direction: this.sortDirection
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
            }
        },
        mounted() {
            console.log(this.usersList);
        }
    }


</script>
