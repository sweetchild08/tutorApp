
document.onload=setTimeout(()=>$('.message').fadeOut(3000),4000);
const showInputErrors=(err)=>{
    $('small').hide()
    err.responseJSON?.errors && (
        Object.entries(err.responseJSON.errors).forEach(([key,value])=>{
            $('#error-'+key).show()
            $('#error-'+key).html(value)
        })
    )
}