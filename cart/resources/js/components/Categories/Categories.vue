<template>
    <div class="categoriesContainer">
        <div v-for="(category, index) in categories.data" :key="index" class="category" style="border: 1px solid #fafafa;">
            <a class="card border-0 shadow" href="food-delivery-category.html">
                <img class="card-img-top" :src="'/uploads/categories/'+ category.image" alt="Noodles">
                <div class="card-body py-4 text-center">
                    <h3 class="h5 mt-1">{{ category.name }}</h3>
                </div>
            </a>
        </div>
            <!-- <div class="categoryPhoto">
                <a :href="'/categories/'+ category.slug + '/' + category.id">
                    <img :src="'/uploads/categories/'+ category.image" alt="">
                </a>
            </div> -->
    </div>
</template>

<script>
export default {
    name: 'Categories',
    data() {
        return {
            categories: [],
        }
    },
    mounted() {
        this.loadCategories();
    },
    
    methods: {
        loadCategories: function() {
            axios.get('/json/categories/')
            .then((response) => {
                this.categories = response.data.data;
            })
            .catch();
        }
    },
}
</script>

<style>
 .categoriesContainer{
    display: flex;
    align-items: center;
    position: relative;
    width: 100%;
    flex-wrap: wrap;
}
.category{
    margin: 10px;
    width: 100%;

}

@media (min-width: 480px) { 
    .category {
        width: calc(50% - 20px);
    }
}

@media (min-width: 768px) { 
    .category {
        width: calc(33.33% - 20px);
    }
}
@media (min-width: 992px) { 
    .category {
        width: calc(33.33% - 20px);
    }
}
@media (min-width: 1200px) { 
    .category {
        width: calc(25% - 20px);
    }
}
.category img{
    height: 150px;
    object-fit: cover;
}
.shadow {
    box-shadow: 0 0.25rem 0.5625rem -0.0625rem rgb(0 0 0 / 3%), 0 0.275rem 1.25rem -0.0625rem rgb(0 0 0 / 5%) !important;
}
</style>