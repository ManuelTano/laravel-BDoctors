<template>
    <div class="card m-4 mx-4 col-3">
        <ul class="ul">
            <li>
                {{ user.first_name }}
                <i class='bx bx-drink'></i>
            </li>
            <li>
                <i class='bx bx-film'></i>
            </li>
            <li>
                <i class='bx bx-store-alt'></i>
            </li>
            <li>
                <i class='bx bx-map'></i>
            </li>
        </ul>
        <img src="" alt="img-profilo">
        <div class="con-text">
            <h2>

            </h2>
            <p>

                <button>
                    see more
                </button>
            </p>
        </div>
    </div>

</template>

<script>
export default {
    name: "AppCard",

    props: {
        user: Object,
    },
};
</script>

<style leng="scss">
.card {
    width: 18.75rem;
    height: 25rem;
    background: #000;
    border-radius: 1.87rem;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .25s ease;
    backface-visibility: hidden;
}

.card:hover {
    transform: scale(.9);
}

.card:hover:after {
    height: 1.75rem;
}

.card:hover .con-text p {
    margin-bottom: 0.5rem;
    opacity: 1;
}

.card:hover img {
    transform: scale(1.25);
}

.card:hover .ul {
    transform: translate(0);
    opacity: 1;
}

.card:after {
    width: 100%;
    content: '';
    left: 0.5rem;
    bottom: 0rem;
    height: 0.93rem;
    position: absolute;
    background: Linear-gradient(18deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 6, 1) 100%);
    z-index: 20;
    transition: all .25s ease;
}

.card img {
    height: 100%;
    z-index: 18;
    transition: all .25s ease;
}

.card .con-text {
    z-index: 30;
    position: absolute;
    bottom: 0rem;
    color: #fff;
    padding: 1.25rem;
    padding-bottom: 1.87rem;
}

.card .con-text p {
    font-size: .8rem;
    Opacity: 0;
    margin-bottom: -10.60rem;
    transition: all .25s ease;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-direction: column;
}

.card .con-text p button {
    padding: 0.43rem 1.06rem;
    border-radius: 0.75rem;
    background: transparent;
    border: 0.125rem solid #fff;
    color: #fff;
    margin-top: 0.625rem;
    margin-left: auto;
    cursor: pointer;
    transition: all .25s ease;

    font-size: 0.75rem;
    outline: none;
}

.card .con-text p button:hover {
    background: #fff;
    color: #000;
}

.ul {
    position: absolute;
    right: 0.625rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    z-index: 40;
    border-radius: 0.875rem;
    padding-left: 0rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    top: 0rem;
    opacity: 0;
    transform: translate(100%);
    transition: all .25s ease;
}

.ul li {
    background: #fff;
    list-style: none;
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: .7;
    transition: all .25s ease;
    backface-visibility: hidden;
}

ul li:last-child {
    border-radius: 0rem 0rem 0.75rem 0.75rem;
}

.ul li:first.child {

    border-radius: 0.75rem 0.75rem 0rem 0rem;
}

.ul li:hover {
    opacity: 1;
    transform: translate(-0.43rem, -0.25rem);
    border-radius: 0.375rem;
}

.ul li i {
    font-size: 1.4rem;
    color: #000;
}
</style>