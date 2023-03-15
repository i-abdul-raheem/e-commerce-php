<form action="api/index.php" method="get" onsubmit="return handleSumbit()">
    <input type="text" name="id" value="1234">
    <input type="submit" value="test">
</form>

<script>
    const handleSumbit = () => {
        return true;
    }
</script>