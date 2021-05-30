<article>
    <div>
        php version <?php echo phpversion(); ?>
    </div>

    <slot />

    <button @click="increment">
        click
    </button>

    {{counter}}
</article>
