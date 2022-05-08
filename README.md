# laravel cursor vs offset pagination

| Pagination Type | Elapsed Time |
|---|---|
| $query->paginate(10) | ~8 seconds |
| $query->simplePaginate(10) | ~4 seconds |
| $query->cursorPaginate(10) | ~3 seconds |


# SQL Query

![](src%5Cimages%5Ccarbon.png)