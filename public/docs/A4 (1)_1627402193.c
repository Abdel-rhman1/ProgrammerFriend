#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <omp.h>
#include <mpi.h>
#define PI 3.1415926535897932384626433832795029L

double f ( double a){
    int j = 0;
    double t = 1.0;
    for(;j < a; j++)
        t *= 2.0;
	return t;
}

int main ( int argc , char * argv []){
	int n , myid , numprocs , i;
	double totalsum , sum , x;
	double sum_local ;
	MPI_Init(& argc ,& argv );

	MPI_Comm_size( MPI_COMM_WORLD ,& numprocs );
	MPI_Comm_rank( MPI_COMM_WORLD ,& myid );
	n = 6;
	{
		for (;;) {
			if ( myid == 0) {
				printf (" Enter the number of intervals : (0 quits ) ");
				scanf ("%d" ,&n );
			}
			MPI_Bcast(&n, 1, MPI_INT , 0 , MPI_COMM_WORLD );
			if ( n == 0)
				break ;
			else {
				sum = 0.0;
				#pragma omp parallel private (i,x, sum_local)
				{
					sum_local = 0.0;
					#pragma omp for
					for ( i = myid + 1; i <= n ; i += numprocs) {
						x = 1.0 / f(i);
						sum_local += x;
					}
					printf("my rank %d, from thread %d with local sum %d\n", myid, omp_get_thread_num(), sum_local);
					# pragma omp critical
					sum += sum_local ; // sum = sum + sum_local
				}
				MPI_Reduce(& sum , &totalsum , 1 , MPI_DOUBLE , MPI_SUM , 0 , MPI_COMM_WORLD );
				if ( myid == 0) {
					printf ("sum is approximatly : %.16f Error is: %.16f\n", totalsum , fabs( 1 - totalsum));
				}
			}
		}
	}
	MPI_Finalize();
	return EXIT_SUCCESS;
}
