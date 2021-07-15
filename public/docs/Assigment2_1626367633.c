#include <stdio.h>
#include <stdlib.h>
#include<string.h>
#include<math.h>
#include<mpi.h>
int main(int argc , char *argv[])
{
    int rank;
    int p;
    int source;
	int dest;
	int n;
	int tag = 0;
	char message[100];
	int locallower = 0 ;
	int localUpper = 0 ;
	int localcount;
	MPI_Status status;
    MPI_Init(&argc , &argv);
    MPI_Comm_rank(MPI_COMM_WORLD , &rank);
    MPI_Comm_size(MPI_COMM_WORLD , &p);
    if(rank == 0){
        int x;
        int *arr = malloc(p * sizeof(int));
        printf("Please The Lower bound\n");
        scanf("%d" , &n);
        printf("%d\n", n);
  }

  return 0;
}
